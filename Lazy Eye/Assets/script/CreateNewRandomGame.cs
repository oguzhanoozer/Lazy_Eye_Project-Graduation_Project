using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class CreateNewRandomGame : MonoBehaviour
{
    public GameObject redBallActive8;
    public GameObject redBallActive12;
    public GameObject redBallActive16;
    public OptionMenu dim;
    public GameObject panel8x6;
    public GameObject panel12x8;
    public GameObject panel16x9;
    public GameObject optionmenu;
    public GameObject myoption;
    public Dropdown randrop;
    ButtonClick button;
    public string[] points;
    public string[] newpoints;

    public int checkGameType_Dim;


    private void Awake()
    {
        button = redBallActive8.GetComponent<ButtonClick>();
        button = redBallActive12.GetComponent<ButtonClick>();
        button = redBallActive16.GetComponent<ButtonClick>();

    }
    public void CallRandom()
    {
        StartCoroutine(Newgame());
    }

    public IEnumerator Newgame()
    {
        WWWForm form = new WWWForm();
        WWW itemsData = new WWW("http://localhost:8080/lazyeye/php/new_random_game.php", form);

        yield return itemsData;

        string itemsDataString = itemsData.text;
        points = itemsDataString.Split('|');

        newpoints = itemsDataString.Split('.');

        print("okan");
        for (int i = 0; i < newpoints.Length; i++)
        {
            print(newpoints[i]);   //databaseden cekilen tum dimension ve random seedler
        }


        if (dim.manual_dimension.text == "8x6")
        {
            panel8x6.SetActive(true);
            panel12x8.SetActive(false);
            panel16x9.SetActive(false);
            optionmenu.SetActive(false);
            myoption.SetActive(false);
        }
        if (dim.manual_dimension.text == "12x8")
        {
            panel8x6.SetActive(false);
            panel12x8.SetActive(true);
            panel16x9.SetActive(false);
            optionmenu.SetActive(false);
            myoption.SetActive(false);
        }
        if (dim.manual_dimension.text == "16x9")
        {
            panel8x6.SetActive(false);
            panel12x8.SetActive(false);
            panel16x9.SetActive(true);
            optionmenu.SetActive(false);
            myoption.SetActive(false);
        }

        switch (randrop.value)
        {
            case 0:
                if (dim.manual_dimension.text == "8x6")
                {

                    checkGameType_Dim = 1;
                }
                else if (dim.manual_dimension.text == "12x8")
                {
                    checkGameType_Dim = 4;
                }
                else if (dim.manual_dimension.text == "16x9")
                {
                    checkGameType_Dim = 7;
                }

                break;
            case 1:
                if (dim.manual_dimension.text == "8x6")
                {
                    checkGameType_Dim = 2;
                }
                else if (dim.manual_dimension.text == "12x8")
                {
                    checkGameType_Dim = 5;
                }
                else if (dim.manual_dimension.text == "16x9")
                {
                    checkGameType_Dim = 8;
                }
                break;
            case 2:
                if (dim.manual_dimension.text == "8x6")
                {
                    checkGameType_Dim = 3;
                }
                else if (dim.manual_dimension.text == "12x8")
                {
                    checkGameType_Dim = 6;
                }
                else if (dim.manual_dimension.text == "16x9")
                {
                    checkGameType_Dim = 9;
                    
                }
                break;
            

        }

        
    }


}