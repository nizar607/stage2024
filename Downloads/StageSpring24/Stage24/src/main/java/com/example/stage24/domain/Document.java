package com.example.stage24.domain;


import jakarta.validation.Valid;
import jakarta.validation.constraints.NotBlank;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.DBRef;
import java.time.LocalDateTime;
@org.springframework.data.mongodb.core.mapping.Document
@Data
@AllArgsConstructor
@NoArgsConstructor
public class Document {
    @Id
    private String id;
    private String filename;
    private String fileType;
    private String fileSize;
    private byte[] file;
}
