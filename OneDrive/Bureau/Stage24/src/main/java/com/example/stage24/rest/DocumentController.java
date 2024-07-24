package com.example.stage24.rest;


import com.example.stage24.domain.legalcase.Document;
import com.example.stage24.service.legalcase.DocumentService;
import com.mongodb.client.gridfs.model.GridFSFile;
import org.springframework.core.io.ByteArrayResource;
import org.springframework.core.io.InputStreamResource;
import org.springframework.http.HttpHeaders;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.beans.factory.annotation.Autowired;
import java.io.IOException;
import org.springframework.http.MediaType;

@RestController
@RequestMapping("/api/documents")
public class DocumentController {
    @Autowired
    private DocumentService fileService;


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
