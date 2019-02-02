using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Networking;
using UnityEngine.UI;
public class ManualGame : MonoBehaviour {
    //  public GameObject dimension;
    public OptionMenu dim;
    // public LoginChecker user;
    public string[] points;
    public string[] newpoints;
    public Text text;
    public int manuelGameI;
    public int checkMan;
    public string username;

  // public GameObject passerUsernameObje;
   // PasserUserName passerUserName;

    public void Start()
    {
       // passerUserName = passerUsernameObje.GetComponent<PasserUserName>();
        username = LoginChecker.username;
    }

    public void CallManual()
    {
        StartCoroutine(Manual());
    }

    IEnumerator Manual()
    {

        WWWForm form = new WWWForm();
        form.AddField("dimension", dim.manual_dimension.text);
        form.AddField("username", username);
        Debug.Log(dim.manual_dimension.text);
        //form.AddField("username", user.nameField.text);

        WWW itemsData = new WWW("http://localhost:8080/lazyeye/php/new_manual_game.php", form);

        yield return itemsData;

        string itemsDataString = itemsData.text;
        points = itemsDataString.Split('#');


        
        for (int i = 0; i < points.Length - 1; i++)
        {
            print(points[i]);
        }

        text.text = points.Length-1 + " games are avaible";
        checkMan = manuelGameI;

      //  for (manuelGameI = 1; manuelGameI<21; manuelGameI++ )
        //   print(newpoints[manuelGameI]);
        
    }

    // Update is called once per frame
    void Update () {
		
	}
}
