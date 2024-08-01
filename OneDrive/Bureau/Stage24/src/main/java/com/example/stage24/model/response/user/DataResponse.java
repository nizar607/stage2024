package com.example.stage24.model.response.user;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import java.util.List;

@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
public class DataResponse {

    private String type = "Bearer";
    //private String id;
    private String firstName;
    private String lastName;
    private String email;
    private String refreshToken;
    private List<String> roles;

}
