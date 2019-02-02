using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class MainMenu : MonoBehaviour {

    public GameObject main;
    public GameObject menu;
    public GameObject scorepanel;
    public GameObject startpanel;
    public GameObject randombutton;
    RandomButtonClick random;
    void Start()
    {
        random = randombutton.GetComponent<RandomButtonClick>();
    }

    public void GoMain()
    {
        random.i = 1;
        main.SetActive(true);
        menu.SetActive(false);
        scorepanel.SetActive(false);
        startpanel.SetActive(true);

    }
}
