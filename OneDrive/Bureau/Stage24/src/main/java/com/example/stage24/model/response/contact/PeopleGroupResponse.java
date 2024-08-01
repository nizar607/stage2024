package com.example.stage24.model.response.contact;

import lombok.AllArgsConstructor;
        import lombok.Getter;
        import lombok.NoArgsConstructor;
        import lombok.Setter;

@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
public class PeopleGroupResponse {
    private String id;
    private String name;
    private String idUser;
    private String userFirstName;
    private String userLastName;
}
