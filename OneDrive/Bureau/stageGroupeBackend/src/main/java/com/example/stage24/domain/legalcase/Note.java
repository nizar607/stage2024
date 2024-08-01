package com.example.stage24.domain.legalcase;

import com.example.stage24.domain.user.User;
import jakarta.validation.constraints.NotBlank;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.DBRef;
import org.springframework.data.mongodb.core.mapping.Document;

import java.time.LocalDateTime;

@Data
@AllArgsConstructor
@NoArgsConstructor
@Document(collection = "notes")
public class Note {

    @Id
    private String id;

    @NotBlank
    private String content;

    @DBRef
    private User createdBy;

    private LocalDateTime createdAt = LocalDateTime.now();
}
