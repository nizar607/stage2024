package com.example.stage24.rest;


import com.example.stage24.service.legalcase.implementation.DocumentService;
import com.example.stage24.service.shared.implementation.SharedServiceImplementation;
import com.mongodb.client.gridfs.model.GridFSFile;
import lombok.AllArgsConstructor;
import org.springframework.core.io.InputStreamResource;
import org.springframework.http.HttpHeaders;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;

import java.io.IOException;
import org.springframework.http.MediaType;

@RestController
@AllArgsConstructor
@RequestMapping("/api/documents")
public class DocumentController {

    private DocumentService fileService;
    private SharedServiceImplementation sharedService;

    @PostMapping("/upload")
    public ResponseEntity<?> upload(@RequestParam("file")MultipartFile file) throws IOException {
        return new ResponseEntity<>(fileService.addFile(file), HttpStatus.OK);
    }

    @GetMapping("/download/{id}")
    public ResponseEntity<InputStreamResource> getFile(@PathVariable String id) throws IOException {
        InputStreamResource resource = fileService.downloadFile(id);
        GridFSFile gridFsFile = fileService.getFileMetadata(id);

        HttpHeaders headers = new HttpHeaders();
        headers.add(HttpHeaders.CONTENT_DISPOSITION, "attachment; filename=" + gridFsFile.getFilename());
        headers.add(HttpHeaders.CONTENT_TYPE, gridFsFile.getMetadata().get("contentType").toString());

        return ResponseEntity.ok()
                .headers(headers)
                .contentLength(gridFsFile.getLength())
                .contentType(MediaType.parseMediaType(gridFsFile.getMetadata().get("contentType").toString()))
                .body(resource);
    }
}
