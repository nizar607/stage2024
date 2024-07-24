package com.example.stage24.domain.legalcase;

import com.example.stage24.domain.user.User;
import jakarta.validation.constraints.Email;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;
import lombok.AllArgsConstructor;
import lombok.Data;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.DBRef;
import org.springframework.data.mongodb.core.mapping.Document;

import java.time.LocalDate;

@Data
@AllArgsConstructor
@Document(collection = "contacts")
public class Contact {

    @Id
    private String id;

    @NotBlank
    private String firstName;

    @NotNull
    private String middleName;

    @NotBlank
    private String lastName;

    @NotBlank
    private LocalDate birthday;

    @NotBlank
    @Email
    private String email;

    @NotBlank
    private String peopleGroup;

    @NotBlank
    private String phoneNumber;

    @NotBlank
    private String address;

    @NotBlank
    private String city;

    @NotBlank
    private String state;

    private Integer zipCode;

    @DBRef
    private User createdBy;

}
