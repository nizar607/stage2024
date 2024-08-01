package com.example.stage24.repository.meeting;

import com.example.stage24.domain.meeting.Meeting;
import org.springframework.data.mongodb.repository.MongoRepository;

public interface MeetingRepository extends MongoRepository<Meeting,String> {

}
