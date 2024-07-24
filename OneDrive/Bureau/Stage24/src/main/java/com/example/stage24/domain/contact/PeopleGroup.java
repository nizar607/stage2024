package com.example.stage24.domain.contact;

import com.example.stage24.domain.user.User;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.NotNull;
import jakarta.validation.constraints.Size;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import lombok.ToString;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.DBRef;
import org.springframework.data.mongodb.core.mapping.Document;

@Data
@ToString
@AllArgsConstructor
@NoArgsConstructor
@Document(collection = "peopleGroups")
public class PeopleGroup {

    @Id
    private String id;

    @NotBlank
    private String name;

    @DBRef
    @NotNull
    private User createdBy;

    public PeopleGroup(String name, User createdBy) {
        this.name = name;
        this.createdBy = createdBy;
    }

}
