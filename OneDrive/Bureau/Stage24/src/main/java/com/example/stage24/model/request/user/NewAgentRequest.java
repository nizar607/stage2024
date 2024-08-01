package com.example.stage24.model.request.user;

import com.example.stage24.domain.user.Access;
import com.example.stage24.domain.user.Role;
import jakarta.validation.constraints.*;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import lombok.ToString;
import org.springframework.data.annotation.CreatedDate;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.DBRef;
import org.springframework.data.mongodb.core.mapping.Document;

import java.io.File;
import java.time.LocalDateTime;
import java.util.HashSet;
import java.util.List;
import java.util.Set;

@Data
@ToString
@NoArgsConstructor
@AllArgsConstructor
public class NewAgentRequest {

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
    private String phoneNumber;

    @NotBlank
    private String address;

    @NotNull
    private List<String> accesses ;

    @NotNull
    private String image ;

    public NewAgentRequest(String firstName, String lastName, String email, String password, String phoneNumber, String address, List<String> accesses, String image) {
        this.firstName = firstName;
        this.lastName = lastName;
        this.email = email;
        this.password = password;
        this.phoneNumber = phoneNumber;
        this.address = address;
        this.accesses = accesses;
        this.image = image;
    }
}
