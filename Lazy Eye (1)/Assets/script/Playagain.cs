using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Playagain : MonoBehaviour

{
    public GameObject startmenu;
    public GameObject mymenu;
    public GameObject randombutton;
    RandomButtonClick random;


    // Start is called before the first frame update
    void Start()
    {
        random = randombutton.GetComponent<RandomButtonClick>();
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    public void goStart()
    {

        random.i = 1;
        startmenu.SetActive(true);
            mymenu.SetActive(false);

    }
}
