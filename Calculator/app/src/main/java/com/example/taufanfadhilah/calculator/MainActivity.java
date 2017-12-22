package com.example.taufanfadhilah.calculator;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import org.w3c.dom.Text;

public class MainActivity extends AppCompatActivity {

    Button btnLogin;
    EditText etUsername, etPassword;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        btnLogin = (Button)findViewById(R.id.btnLogin);
        etUsername = (EditText)findViewById(R.id.etUsername);
        etPassword = (EditText)findViewById(R.id.etPassword);
        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (etUsername.getText().toString().equals("admin") && etPassword.getText().toString().equals("qwe123")){
                    Intent i = new Intent(getApplicationContext(), Dashboard.class);
                    startActivity(i);
                }else{
                    System.out.println(etUsername.getText().equals("admin"));
                    System.out.println(etPassword.getText());
                    TextView tvLogin = (TextView)findViewById(R.id.textView);
                    tvLogin.setText("Login Failed!");
                }
            }
        });
    }
}
