package com.example.stage24.domain.legalcase;

import com.example.stage24.domain.meeting.Meeting;
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
    private String number;

    @NotBlank
    private String description;

    @NotBlank
    private String type;

    @NotBlank
    private CaseStatus status;

    @DBRef
    private @Valid User lawyer;

    @DBRef
    private Set<Contact> contact;

    @DBRef
    private OpposingParty opposingParty;

    @DBRef
    private Set<Phase> phases;

    @Valid
    private Phase currentPhase;

    @DBRef
    private Set<Note> notes;

    @DBRef
    private Set<User> agents;

    @DBRef
    private Set<Meeting> meetings;

    @Valid
    private Meeting lastMeeting;

}
