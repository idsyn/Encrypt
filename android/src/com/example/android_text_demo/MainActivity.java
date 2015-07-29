package com.example.android_text_demo;

import android.app.Activity;
import android.os.Bundle;

public class MainActivity extends Activity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		String key = "27650099-564A-4869-99B3-363F8129C0CD";
		String value = "张三内部购房百分点办法对你表白";
		String jiami = value;
		System.out.println("加密数据:" + jiami);
		try {
			String a = DESUtil.ENCRYPTMethod(jiami, key).toUpperCase();
			System.out.println("加密后的数据为:" + a);
			String b = DESUtil.decrypt(a, key);
			System.out.println("解密后的数据:" + b);
		} catch (Exception e) {
			e.printStackTrace();
		}

	}

}
