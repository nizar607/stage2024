package com.example.stage24.domain.meeting;

import jakarta.validation.constraints.NotBlank;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;

import java.time.Duration;
import java.time.LocalDateTime;

@Data
@AllArgsConstructor
@Document(collection = "meetings")
public class Meeting {

    @Id
    private String id;

    @NotBlank
    private LocalDateTime date;

    @NotBlank
    private Duration duration;

    @NotBlank
    private String purpose;

}
