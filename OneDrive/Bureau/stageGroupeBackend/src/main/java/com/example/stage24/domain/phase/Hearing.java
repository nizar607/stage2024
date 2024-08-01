package com.example.stage24.domain.phase;

import com.example.stage24.domain.court.Court;
import jakarta.validation.constraints.NotBlank;
import lombok.AllArgsConstructor;
import lombok.Data;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.DBRef;
import org.springframework.data.mongodb.core.mapping.Document;

import java.time.LocalDateTime;

@Data
@AllArgsConstructor
@Document(collection = "hearings")
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
