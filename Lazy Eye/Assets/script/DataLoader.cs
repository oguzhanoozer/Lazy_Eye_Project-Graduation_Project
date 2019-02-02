using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class DataLoader : MonoBehaviour {

    public string[] points;
	// Use this for initialization
	IEnumerator Start () {
        WWW itemsData = new WWW("http://localhost:8080/lazyeye/new_manual_game.php");
        yield return itemsData;
        string itemsDataString = itemsData.text;
        points = itemsDataString.Split('\n');
        

	}
	
	
}
