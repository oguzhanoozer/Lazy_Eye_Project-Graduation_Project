using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.Networking;
using System.Text.RegularExpressions;

using System.Security.Cryptography;
using System.Text;

public class SignIn : MonoBehaviour {

    public GameObject loginPanel;
    public GameObject signUpPanel;

    public InputField username;
    public InputField name_;
    public InputField surname;
    public InputField age;
    public InputField email;
    public InputField password;
    public InputField password2;
    public Text error;
    private string g_string;
    private string username1;
    private string name1;
    private string surname1;
    private string age1;
    private string email1;
    private string password1;
    private string password2_;

    public const string MatchEmailPattern =
        @"^(([\w-]+\.)+[\w-]+|([a-zA-Z]{1}|[\w-]{2,}))@"
        + @"((([0-1]?[0-9]{1,2}|25[0-5]|2[0-4][0-9])\.([0-1]?[0-9]{1,2}|25[0-5]|2[0-4][0-9])\."
          + @"([0-1]?[0-9]{1,2}|25[0-5]|2[0-4][0-9])\.([0-1]?[0-9]{1,2}|25[0-5]|2[0-4][0-9])){1}|"
        + @"([a-zA-Z]+[\w-]+\.)+[a-zA-Z]{2,4})$";


    public void Submit()
    {
        error.text = "";
        username1 = username.text;
        name1 = name_.text;
        surname1 = surname.text;
        age1 = age.text;
        email1 = email.text;
        password1 = password.text;
        password2_ = password2.text;

        int number;
        
        bool isNumber = int.TryParse(age1, out number);
        
        if (password1 == password2_ && IsValidEmail(email1) && isNumber)
        {
           string hashPass= check(password1);
            StartCoroutine(Register(username1, name1, surname1, age1, email1, hashPass));
        }

        else if (password1 == password2_ && isNumber && !IsValidEmail(email1))
        {
            error.text = "Invalid email! Please enter valid email adress.";
        }

        else if (password1 != password2_ && isNumber && IsValidEmail(email1))
        {
            error.text = "Passwords doesnt match";
        }

        else if (password1 == password2_ && !isNumber && IsValidEmail(email1))
        {
            error.text = "PLease enter a number value";
        }

        else if (password1 != password2_ && !IsValidEmail(email1) && !isNumber)
        {
            error.text = "Passwords doesnt match, and invalid email! Please enter valid email adress and a number value. ";
        }


        else if (password1 != password2_ && IsValidEmail(email1) && !isNumber)
        {
            error.text = "Passwords doesnt match and invalid number value. PLease enter a number value.";
        }
        else if (password1 == password2_ && !IsValidEmail(email1) && !isNumber)
        {
            error.text = "Invalid email and a number value! Please enter valid email adress and a number value. ";
        }

        else if (password1 != password2_ && !IsValidEmail(email1) && isNumber)
        {
            error.text = "Passwords doesnt match, and invalid email! Please enter valid email adress.";
        }

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


    public static bool IsValidEmail(string email)
    {
        if (email != null) return Regex.IsMatch(email, MatchEmailPattern);
        else return false;
    }
    

    IEnumerator Register(string user,string name,string surname,string age,string email,string password)
    {
        UnityWebRequest link = UnityWebRequest.Get("http://localhost:8080/lazyeye/php/register.php?users=" + user+"&name="+name+"&surname="+surname+"&age="+age+"&email="+email+"&password="+password);
        yield return link.SendWebRequest();

        if (link.isNetworkError)
        {
            Debug.Log(link.error);

        }
        else
        {
            g_string = link.downloadHandler.text;
            g_string += "\nLoading login page.";
            
            show_error(g_string.ToString());

            Invoke("GotoLogin", 3.0f);

        }

    }
    private void show_error(string k)
    {
        string[] arr = null;
        arr = k.Split(new string[] { " " }, System.StringSplitOptions.RemoveEmptyEntries);

      
        error.text = k; 
    }

    void GotoLogin()
    {
        signUpPanel.SetActive(false);
        loginPanel.SetActive(true);
    }
    

}
