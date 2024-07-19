package com.example.stage24.domain.phase;

import com.example.stage24.domain.legalcase.Case;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotEmpty;
import lombok.AllArgsConstructor;
import lombok.Data;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.DBRef;
import org.springframework.data.mongodb.core.mapping.Document;

import java.time.LocalDateTime;
import java.util.Set;

@Data
@AllArgsConstructor
@Document(collection = "phases")
public class Phase {

    @Id
    private String id;

    @NotBlank
    private String name;

    @NotEmpty
    private String description;

    @NotBlank
    private LocalDateTime startDate;

    @NotBlank
    private LocalDateTime endDate;

    @DBRef
    private Case concernedCase;

    @DBRef
    private Set<Hearing> hearings;

}