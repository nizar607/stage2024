package com.example.stage24.service.shared.implementation;


import com.example.stage24.domain.user.User;
import com.example.stage24.repository.user.UserRepository;
import com.example.stage24.service.shared.SharedServiceInterface;
import com.mongodb.BasicDBObject;
import com.mongodb.DBObject;
import com.mongodb.client.gridfs.model.GridFSFile;
import lombok.AllArgsConstructor;
import org.bson.types.ObjectId;
import org.springframework.core.io.InputStreamResource;
import org.springframework.data.mongodb.gridfs.GridFsOperations;
import org.springframework.data.mongodb.gridfs.GridFsTemplate;
import org.springframework.http.HttpStatus;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.stereotype.Service;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.server.ResponseStatusException;
import java.io.IOException;
import java.util.Optional;


@Service
@AllArgsConstructor
public class SharedServiceImplementation implements SharedServiceInterface {

    private GridFsTemplate template;

    private UserRepository userRepository;

    private GridFsOperations operations;

    @Override
    public String addFile(MultipartFile upload) throws IOException {

        DBObject metadata = new BasicDBObject();
        metadata.put("fileSize", upload.getSize());
        metadata.put("contentType", upload.getContentType());

        ObjectId fileID = template.store(upload.getInputStream(), upload.getOriginalFilename(), upload.getContentType(), metadata);

        return fileID.toString();
    }

    @Override
    public InputStreamResource downloadFile(String agentId) throws IOException {
        User user  = userRepository.findById(agentId).orElseThrow(() -> new RuntimeException("User not found with id: " + agentId));
        GridFSFile gridFsFile = template.findOne(new org.springframework.data.mongodb.core.query.Query().addCriteria(org.springframework.data.mongodb.core.query.Criteria.where("_id").is(user.getImage())));

        if (gridFsFile == null) {
            throw new ResponseStatusException(HttpStatus.NOT_FOUND, "File not found");
        }

        return new InputStreamResource(template.getResource(gridFsFile).getInputStream());
    }

    @Override
    public GridFSFile getFileMetadata(String id) {
        GridFSFile gridFsFile = template.findOne(new org.springframework.data.mongodb.core.query.Query().addCriteria(org.springframework.data.mongodb.core.query.Criteria.where("_id").is(id)));

        if (gridFsFile == null) {
            throw new ResponseStatusException(HttpStatus.NOT_FOUND, "File not found");
        }

        return gridFsFile;
    }



    @Override
    public Optional<User> getConnectedUser() {
        Authentication authentication = SecurityContextHolder.getContext().getAuthentication();
        String currentUsername = ((UserDetails) authentication.getPrincipal()).getUsername();
        return userRepository.findByEmail(currentUsername);
    }
}

