package com.example.stage24.domain.invoice;

import jakarta.validation.constraints.NotBlank;
import lombok.AllArgsConstructor;
import lombok.Data;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;

import java.time.LocalDateTime;

@Data
@AllArgsConstructor
@Document(collection = "invoices")
public class Invoice {

    @Id
    private String id;

    @NotBlank
    private LocalDateTime issueDate;

    @NotBlank
    private LocalDateTime dueDate;

    @NotBlank
    private double totalAmount;

    private InvoiceStatus status;


}
