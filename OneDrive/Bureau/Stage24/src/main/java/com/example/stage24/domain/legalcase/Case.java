package com.example.stage24.domain.legalcase;

import com.example.stage24.domain.phase.Phase;
import com.example.stage24.domain.user.User;
import jakarta.validation.Valid;
import jakarta.validation.constraints.NotBlank;
import lombok.AllArgsConstructor;
import lombok.Data;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.DBRef;
import org.springframework.data.mongodb.core.mapping.Document;

import java.util.Set;

@Data
@AllArgsConstructor
@Document(collection = "cases")
public class Case {

    @Id
    private String id;

    @NotBlank
    private String title;

    @NotBlank
    private String description;

    @NotBlank
    private CaseStatus status;

    @NotBlank
    private Phase currentPhase;

    @DBRef
    @Valid
    private User lawyer;

    @DBRef
    private OpposingParty opposingParty;

    @DBRef
    private Set<Phase> phases;

}
