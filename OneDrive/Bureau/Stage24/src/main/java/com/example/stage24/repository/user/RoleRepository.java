package com.example.stage24.repository.user;

import com.example.stage24.domain.user.RoleType;
import com.example.stage24.domain.user.Role;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.stereotype.Repository;

import java.util.Optional;

@Repository
public interface RoleRepository extends MongoRepository<Role, String> {
  Optional<Role> findByName(RoleType name);
}
