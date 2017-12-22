package com.example.taufanfadhilah.calculator;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

/**
 * Created by Taufan Fadhilah on 12/22/2017.
 */

public class Multiple extends AppCompatActivity {
    TextView tvHeader, tvResult;
    EditText etFirstNumber, etSecondNumber;
    Button btnResult;
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.calculator);
        tvHeader = (TextView)findViewById(R.id.tvHeader);
        tvResult = (TextView)findViewById(R.id.tvResult);
        etFirstNumber = (EditText)findViewById(R.id.etFirstNumber);
        etSecondNumber = (EditText)findViewById(R.id.etSecondNumber);
        btnResult = (Button)findViewById(R.id.btnResult);

        tvHeader.setText("Calculator : Multiple");
        btnResult.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                int number1, number2, result;
                number1 = Integer.parseInt(etFirstNumber.getText().toString());
                number2 = Integer.parseInt(etSecondNumber.getText().toString());
                result = number1*number2;
                tvResult.setText(Integer.toString(result));
            }
        });
    }
}
