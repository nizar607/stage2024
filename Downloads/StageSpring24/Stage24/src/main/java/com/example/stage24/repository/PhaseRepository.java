package com.example.stage24.repository;

import com.example.stage24.domain.Phase;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface PhaseRepository extends MongoRepository<Phase,String> {

}
