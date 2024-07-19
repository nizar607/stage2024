package com.example.stage24.domain;

import jakarta.validation.constraints.NotBlank;
import lombok.Data;
import lombok.NoArgsConstructor;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.DBRef;

import java.time.LocalDateTime;

@Data
@NoArgsConstructor
public class Hearing {

    @Id
    private String id;
    @NotBlank
    private LocalDateTime date;
    @NotBlank
    private String description;
    @DBRef
    private Court court;
    @DBRef
    private Phase phase;

}
