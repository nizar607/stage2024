package com.example.stage24.service.user;

import com.example.stage24.domain.user.Role;
import com.example.stage24.domain.user.User;
import com.example.stage24.model.request.user.LoginRequest;
import com.example.stage24.model.request.user.SignupRequest;
import com.example.stage24.model.request.user.TokenRefreshRequest;
import com.example.stage24.model.response.user.LoginResponse;
import com.example.stage24.model.response.user.TokenRefreshResponse;

import java.util.List;
import java.util.Optional;


public interface IUserService {

    public LoginResponse authenticateUser(LoginRequest loginRequest);

    public TokenRefreshResponse refreshtoken(TokenRefreshRequest request);

    public User registerUser(SignupRequest signUpRequest);


    public Role addRole(Role role);

    public List<User> getUsers();

    public User getUserById(String id);

    public Optional<User> getConnectedUser();
}
