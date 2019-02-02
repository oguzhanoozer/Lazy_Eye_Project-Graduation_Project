using System;
using System.Collections;
using System.Collections.Generic;
using System.Security.Cryptography;
using System.Text;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class LoginChecker : MonoBehaviour {

    public static string username;
    public Text info;
    public InputField nameField;
    public InputField passwordField;


    public GameObject passerUserNameObje;
    PasserUserName passerUserName;

    public void CallLogin()
    {
        StartCoroutine(Login());
    }



    IEnumerator Login()
    {
        string hashComputePass = check(passwordField.text);

        WWWForm form = new WWWForm();
        form.AddField("username", nameField.text);
    
        form.AddField("password", hashComputePass);
        WWW www = new WWW("http://localhost:8080/lazyeye/php/login.php", form);

        yield return www;

        if (www.text[0] == '0')
        {
            username = nameField.text;

            passerUserName.username = username;
            
            Debug.Log("username " + username);
            SceneManager.LoadScene("lazyeye");

        }
        else
            info.text = www.text;

    }

    // Use this for initialization
    void Start() {
        passerUserName = passerUserNameObje.GetComponent<PasserUserName>();
    }

    string check(string str)
    {
        MD5 md5 = new MD5CryptoServiceProvider();

        //compute hash from the bytes of text  
        md5.ComputeHash(ASCIIEncoding.ASCII.GetBytes(str));

        //get hash result after compute it  
        byte[] result = md5.Hash;

        StringBuilder strBuilder = new StringBuilder();
        for (int i = 0; i < result.Length; i++)
        {
            //change it into 2 hexadecimal digits  
            //for each byte  
            strBuilder.Append(result[i].ToString("x2"));
        }

        return strBuilder.ToString();
    }


        // Update is called once per frame
        void Update () {
        
	}
}