package com.example.stage24.repository.user;

import com.example.stage24.domain.user.Access;
import com.example.stage24.domain.user.AccessType;
import com.example.stage24.domain.user.Role;
import org.springframework.data.mongodb.repository.MongoRepository;

import java.util.List;
import java.util.Optional;

public interface AccessRepository extends MongoRepository<Access, String> {
    Optional<Access> findByType(AccessType type);
    void deleteById(String id);
    void deleteAll();
}
