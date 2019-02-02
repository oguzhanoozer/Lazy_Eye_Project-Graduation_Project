using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class CreateNewGame : MonoBehaviour {
    public OptionMenu dim;
    public GameObject panel8x6;
    public GameObject panel12x8;
    public GameObject panel16x9;
    public GameObject optionmenu;
    public GameObject myoption;

    
    public GameObject score8x6, score12x8, score16x9, start8x6, start12x8, start16x9;


	public void Newgame ()
    {
     
        if(dim.manual_dimension.text=="8x6")
        {


            panel8x6.SetActive(true);
            panel12x8.SetActive(false);
            panel16x9.SetActive(false);
            optionmenu.SetActive(false);
            myoption.SetActive(false);
            score8x6.SetActive(false);
            start8x6.SetActive(true);
        }
        if (dim.manual_dimension.text == "12x8")
        {
            panel8x6.SetActive(false);
            panel12x8.SetActive(true);
            panel16x9.SetActive(false);
            optionmenu.SetActive(false);
            myoption.SetActive(false);
            score12x8.SetActive(false);
            start12x8.SetActive(true);
        }
        if (dim.manual_dimension.text == "16x9")
        {
            panel8x6.SetActive(false);
            panel12x8.SetActive(false);
            panel16x9.SetActive(true);
            optionmenu.SetActive(false);
            myoption.SetActive(false);
            score16x9.SetActive(false);
            start16x9.SetActive(true);
        }

    }
	
	
}
