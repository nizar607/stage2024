package com.example.stage24.model.request.contact;

import jakarta.validation.constraints.NotBlank;
import lombok.Data;
import lombok.NoArgsConstructor;
import lombok.ToString;

@Data
@ToString
@NoArgsConstructor
public class NewPeopleGroupRequest {

    @NotBlank
    private String name;
    @NotBlank
    private String createdBy;

}
