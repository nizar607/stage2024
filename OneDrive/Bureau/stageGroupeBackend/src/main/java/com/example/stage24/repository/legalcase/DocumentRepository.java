package com.example.stage24.repository.legalcase;

import com.example.stage24.domain.legalcase.Document;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface DocumentRepository extends MongoRepository<Document,String> {
}
