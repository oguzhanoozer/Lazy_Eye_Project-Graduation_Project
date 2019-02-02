using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;


public class DimensionMenu : MonoBehaviour {

    public GameObject dimension1;
    public GameObject dimension2;
    public GameObject dimension3;
    public GameObject menu;
    public Dropdown mydropdown;
    
    ButtonClick buttonClick;
    string dimension;
    public Text gamestext;
    

   

    // Update is called once per frame
    void Update () {
		
	}
   

    public void SelectDimension()
    {
        



        switch (mydropdown.value)
        {
            case 0:
                
               

                menu.SetActive(false);
                dimension1.SetActive(true);
                dimension2.SetActive(false);
                dimension3.SetActive(false);
                
                break;
            case 1:
               

                menu.SetActive(false);
                dimension1.SetActive(false);
                dimension2.SetActive(true);
                dimension3.SetActive(false);
                
                break;
            case 2:
                
                menu.SetActive(false);
                dimension1.SetActive(false);
                dimension2.SetActive(false);
                dimension3.SetActive(true);
                
                break;
        }

        
        

    }
}
