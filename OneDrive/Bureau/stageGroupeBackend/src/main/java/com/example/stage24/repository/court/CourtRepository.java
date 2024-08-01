package com.example.stage24.repository.court;

import com.example.stage24.domain.phase.Phase;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface CourtRepository extends MongoRepository<Phase,String> {

}
