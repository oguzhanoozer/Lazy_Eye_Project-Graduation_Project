using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class OptionMenu : MonoBehaviour {
    ButtonClick buttonClick;
    
    public Dropdown mydropdown1;
    public Dropdown mydropdown2;
    string menu;
    public GameObject myoptionmenu;
    public GameObject randommenu;
    public GameObject manualmenu;
    public Text rand_dimension;
    public Text manual_dimension;
    PasserUserName userName;




    

    // Update is called once per frame
    void Update () {

    }
    public void Check()
    {
        


        switch (mydropdown1.value)
        {
            case 0:
                rand_dimension.text = "8x6";
                manual_dimension.text = "8x6";
                menu = "8x6";
                break;
            case 1:
                rand_dimension.text = "12x8";
                manual_dimension.text = "12x8";
                menu = "12x8";
                break;
            case 2:
                rand_dimension.text = "16x9";
                manual_dimension.text = "16x9";
                menu = "16x9";
                break;
          
        }


        switch (mydropdown2.value)
        {
            
            case 0:
                
                manualmenu.SetActive(false);
                randommenu.SetActive(true);
            //    myoptionmenu.SetActive(false);

                break;
            case 1:
              
                randommenu.SetActive(false);
                manualmenu.SetActive(true);
               // myoptionmenu.SetActive(false);


                break;
                
        }
     //   transform.parent.gameObject.SetActive(false);
        // option.SetActive(false);
    }
    
}
