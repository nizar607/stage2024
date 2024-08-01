package com.example.stage24.service.legalcase.implementation;


import com.mongodb.BasicDBObject;
import com.mongodb.DBObject;
import com.mongodb.client.gridfs.model.GridFSFile;
import org.bson.types.ObjectId;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.core.io.InputStreamResource;
import org.springframework.data.mongodb.gridfs.GridFsOperations;
import org.springframework.data.mongodb.gridfs.GridFsTemplate;
import org.springframework.http.HttpStatus;
import org.springframework.stereotype.Service;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.server.ResponseStatusException;

import java.io.IOException;


@Service
public class DocumentService {
    @Autowired
    private GridFsTemplate template;

    @Autowired
    private GridFsOperations operations;

    public String addFile(MultipartFile upload) throws IOException {

        DBObject metadata = new BasicDBObject();
        metadata.put("fileSize", upload.getSize());
        metadata.put("contentType", upload.getContentType());

        ObjectId fileID = template.store(upload.getInputStream(), upload.getOriginalFilename(), upload.getContentType(), metadata);

        return fileID.toString();
    }


    public InputStreamResource downloadFile(String id) throws IOException {
        GridFSFile gridFsFile = template.findOne(new org.springframework.data.mongodb.core.query.Query().addCriteria(org.springframework.data.mongodb.core.query.Criteria.where("_id").is(id)));

        if (gridFsFile == null) {
            throw new ResponseStatusException(HttpStatus.NOT_FOUND, "File not found");
        }

        return new InputStreamResource(template.getResource(gridFsFile).getInputStream());
    }

    public GridFSFile getFileMetadata(String id) {
        GridFSFile gridFsFile = template.findOne(new org.springframework.data.mongodb.core.query.Query().addCriteria(org.springframework.data.mongodb.core.query.Criteria.where("_id").is(id)));

        if (gridFsFile == null) {
            throw new ResponseStatusException(HttpStatus.NOT_FOUND, "File not found");
        }

        return gridFsFile;
    }

}
