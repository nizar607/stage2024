package com.example.stage24.repository.user;

import com.example.stage24.domain.user.User;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.stereotype.Repository;

import java.util.Optional;

@Repository
public interface UserRepository extends MongoRepository<User, String> {


    Optional<User> findByEmail(String email);

    Boolean existsByEmail(String email);
}
