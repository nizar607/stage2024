package com.example.stage24.repository.phase;

import com.example.stage24.domain.phase.Phase;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface PhaseRepository extends MongoRepository<Phase,String> {

}
