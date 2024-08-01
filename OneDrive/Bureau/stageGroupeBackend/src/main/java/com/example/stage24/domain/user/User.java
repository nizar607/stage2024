package com.example.stage24.domain.user;

import jakarta.validation.constraints.*;
import lombok.*;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.DBRef;
import org.springframework.data.mongodb.core.mapping.Document;

import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.HashSet;
import java.util.List;
import java.util.Set;

@Data
@AllArgsConstructor
@NoArgsConstructor
@ToString
@Document(collection = "users")
public class User {

    @Id
    private String id;

    @NotBlank
    @Size(max = 20)
    private String firstName;

    @NotBlank
    @Size(max = 20)
    private String lastName;

    @NotBlank
    @Size(max = 50)
    @Email
    private String email;

    @NotBlank
    @Size(max = 120)
    private String password;

    @NotBlank
    private boolean enabled;

    private LocalDateTime createdAt = LocalDateTime.now();

    private String phoneNumber;

    private String address;

    private String image;

    @DBRef
    private Set<Role> roles = new HashSet<>();

    @DBRef
    private List<Access> accesses = new ArrayList<>();
    @Null
    private Integer firmSize;


    @DBRef
    private User createdBy;



    public User(String email, String firstName, String lastName, String password) {
        this.email = email;
        this.firstName = firstName;
        this.lastName = lastName;
        this.password = password;
    }

    public User(String email, String firstName, String lastName, String password, Integer firmSize) {
        this.email = email;
        this.firstName = firstName;
        this.lastName = lastName;
        this.password = password;
        this.firmSize = firmSize;
    }

    public User(String firstName, String lastName, String email, String password, String phoneNumber, String address, String image) {
        this.firstName = firstName;
        this.lastName = lastName;
        this.email = email;
        this.password = password;
        this.phoneNumber = phoneNumber;
        this.address = address;
        this.image = image;
    }

}
