package com.example.stage24.domain.court;

import com.example.stage24.domain.phase.Hearing;
import jakarta.validation.Valid;
import jakarta.validation.constraints.Email;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.Size;
import lombok.AllArgsConstructor;
import lombok.Data;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.DBRef;
import org.springframework.data.mongodb.core.mapping.Document;

import java.util.Set;

@Data
@AllArgsConstructor
@Document(collection = "courts")
public class Court {

    @Id
    private String id;

    @NotBlank
    @Size(max = 100)
    private String name;

    @NotBlank
    private CourtType type;

    @NotBlank
    private String address;

    @NotBlank
    private String city;

    @NotBlank
    private String state;

    @NotBlank
    private String country;

    @DBRef
    private Set<@Valid Hearing> hearings;

    @NotBlank
    @Size(min = 8, max = 15)
    private String phoneNumber;

    @Email
    @NotBlank
    private String email;

    @NotBlank
    private String website;

}
