using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
public class Backbutton : MonoBehaviour {

    
    public GameObject gameoptionmenu;
    public GameObject menu;
    public Text text;

    
    private NewButtonClick newButtonClick;

    public GameObject dim8x6,dim12x8,dim16x9;

    public GameObject dimPanel;

    private void Start()
    {
        newButtonClick = dimPanel.GetComponent<NewButtonClick>();
    }

    public void GoBack()
    {
        
        newButtonClick.gameId = 0;

        dim8x6.SetActive(false);
        dim12x8.SetActive(false);
        dim16x9.SetActive(false);
        menu.SetActive(false);
        gameoptionmenu.SetActive(true);
        text.text = "Please check your avaible games";
    }
}
