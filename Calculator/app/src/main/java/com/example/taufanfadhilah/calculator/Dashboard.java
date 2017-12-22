package com.example.taufanfadhilah.calculator;

import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;

/**
 * Created by Taufan Fadhilah on 12/22/2017.
 */

public class Dashboard extends AppCompatActivity {
    Button btnSum,btnMin,btnMultiple,btnDivide;
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.dashboard);
        btnSum = (Button)findViewById(R.id.btnSum);
        btnMin = (Button)findViewById(R.id.btnMin);
        btnMultiple = (Button)findViewById(R.id.btnMultiplication);
        btnDivide = (Button)findViewById(R.id.btnDivision);
        btnSum.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getApplicationContext(), Sum.class);
                startActivity(i);
            }
        });
        btnMin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getApplicationContext(), Min.class);
                startActivity(i);
            }
        });
        btnMultiple.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getApplicationContext(), Multiple.class);
                startActivity(i);
            }
        });
        btnDivide.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getApplicationContext(), Divide.class);
                startActivity(i);
            }
        });
    }
}
