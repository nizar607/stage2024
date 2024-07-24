package com.example.stage24.service;

import com.example.stage24.domain.user.Role;
import com.example.stage24.domain.user.User;
import com.example.stage24.model.request.LoginRequest;
import com.example.stage24.model.request.SignupRequest;
import com.example.stage24.model.request.TokenRefreshRequest;
import com.example.stage24.model.response.JwtResponse;
import com.example.stage24.model.response.LoginResponse;
import com.example.stage24.model.response.TokenRefreshResponse;

import java.util.List;


public interface IUserService {

    public LoginResponse authenticateUser(LoginRequest loginRequest);

    public TokenRefreshResponse refreshtoken(TokenRefreshRequest request);

    public User registerUser(SignupRequest signUpRequest);

    public Role addRole(Role role);

    public List<User> getUsers();

    public User getUserById(String id);

}
