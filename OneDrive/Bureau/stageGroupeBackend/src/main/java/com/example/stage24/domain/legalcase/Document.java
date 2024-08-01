package com.example.stage24.domain.legalcase;

import jakarta.validation.constraints.NotBlank;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import org.springframework.data.annotation.Id;

@Data
@AllArgsConstructor
@NoArgsConstructor
@org.springframework.data.mongodb.core.mapping.Document(collection = "documents")
public class Document {
    @Id
    private String id;

    @NotBlank
    private String filename;

    @NotBlank
    private String fileType;

    @NotBlank
    private String fileSize;

    @NotBlank
    private byte[] file;
}
