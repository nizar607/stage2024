package com.example.stage24.service.shared;

import com.example.stage24.domain.user.User;
import com.mongodb.BasicDBObject;
import com.mongodb.DBObject;
import com.mongodb.client.gridfs.model.GridFSFile;
import org.bson.types.ObjectId;
import org.springframework.core.io.InputStreamResource;
import org.springframework.http.HttpStatus;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.server.ResponseStatusException;

import java.io.IOException;
import java.util.Optional;

public interface SharedServiceInterface {

    public String addFile(MultipartFile upload) throws IOException;

    public InputStreamResource downloadFile(String id) throws IOException;

    public GridFSFile getFileMetadata(String id);

    public Optional<User> getConnectedUser();
}
