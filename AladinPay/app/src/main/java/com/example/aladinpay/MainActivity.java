package com.example.aladinpay;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.activity.EdgeToEdge;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

public class MainActivity extends AppCompatActivity {
    EditText dp_amount,tr_id;
    Button dp_Btn,tr_btn;
    TextView tv_data;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        dp_amount = findViewById(R.id.dp_amount);
        dp_Btn = findViewById(R.id.dp_Btn);
        tr_id = findViewById(R.id.tr_id);
        tr_btn = findViewById(R.id.tr_Btn);
        tv_data = findViewById(R.id.tv_data);

        tr_id.setText("W472L59413");
        dp_Btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String amount = dp_amount.getText().toString();
                if (!amount.isEmpty()){
                    String link = "https://pma.techrahman.xyz/index.php?amount="+amount;
                    Intent browserIntent = new Intent(Intent.ACTION_VIEW, Uri.parse(link));
                    startActivity(browserIntent);
                }

            }
        });

        tr_btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String trid = tr_id.getText().toString();
                if (!trid.isEmpty()){
                    String link = "https://pma.techrahman.xyz/verify.php?id="+trid;
                    sarver(link);
                }

            }
        });


    }

    private void sarver(String link){
        Toast.makeText(MainActivity.this, ""+link, Toast.LENGTH_SHORT).show();
        JsonObjectRequest jsonObjectRequest = new JsonObjectRequest(Request.Method.GET, link, null,
                new Response.Listener<JSONObject>() {
                    @Override
                    public void onResponse(JSONObject response) {
                        try {
                            String status = response.getString("status");
                            if (status.equals("1")) {
                                String cus_name = response.getString("cus_name");
                                String amount = response.getString("amount");

                                

                            } else {

                            }
                        } catch (JSONException e) {
                            e.printStackTrace();

                        }

                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.d("responce123",error.toString().trim());
            }
        });
        RequestQueue requestQueue = Volley.newRequestQueue(MainActivity.this);
        requestQueue.add(jsonObjectRequest);
    }
}