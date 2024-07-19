package com.example.stage24.repository.user;


import com.example.stage24.domain.user.RefreshToken;
import com.example.stage24.domain.user.User;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.stereotype.Repository;

import java.util.Optional;

@Repository
public interface RefreshTokenRepository extends MongoRepository<RefreshToken, Long> {

    Optional<RefreshToken> findByToken(String token);

    int deleteByUser(User user);
}