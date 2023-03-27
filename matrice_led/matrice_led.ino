/***************************************************
*
* For 32x16 RGB LED matrix.
*
* @author lg.gang
* @version  V1.0
* @date  2016-10-28
*
* GNU Lesser General Public License.
* See <http://www.gnu.org/licenses/> for details.
* All above must be included in any redistribution
* ****************************************************/

#include <Adafruit_GFX.h>   // Core graphics library
#include <RGBmatrixPanel.h> // Hardware-specific library
#include <stdlib.h> // random
#include <time.h>   // pour rand
 

#define CLK 8  // MUST be on PORTB! (Use pin 11 on Mega)
#define LAT A3
#define OE  9
#define A   A0
#define B   A1
#define C   A2
RGBmatrixPanel matrix(A, B, C, CLK, LAT, OE, false);

int i;
int j;
int eysdelay;
int etat;

void setup() {
  matrix.begin();
}

void loop() {
  
  etat = 1;

  while (etat==1)
  {
    happy();
  }

  while (etat==2)
  {
    sad();  
  }
  
  while (etat==3)
  {
    angre();  
  }
  
 
}

void happy() {

  i=0;
  j=0;
  matrix.fillCircle(8 , 7, 4, matrix.Color333(0, 3, 7));
  matrix.fillCircle(23, 7, 4, matrix.Color333(0, 3, 7));

  
  eysdelay = (rand() % 100)*100; 
  Serial.println("eysdelay");
  delay(eysdelay);


  for(i=0 ; i<=7 ; i++) {

    matrix.fillCircle(8 , i, 4, matrix.Color333(0, 0, 0));
    matrix.fillCircle(23, i, 4, matrix.Color333(0, 0, 0));

    delay(2);
  }

  delay(200);

  for(j=0 ; j<=7 ; j++) {

    matrix.fillCircle(8 , 7, 4, matrix.Color333(0, 0, 7));
    matrix.fillCircle(23, 7, 4, matrix.Color333(0, 0, 7));
    matrix.fillCircle(8 , 7-j, 4, matrix.Color333(0, 0, 0));
    matrix.fillCircle(23, 7-j, 4, matrix.Color333(0, 0, 0));

    delay(2);
  }

}

void sad() {
 //x1, y1, x2, y2
  i=0;
  j=0;
  matrix.fillCircle(8 , 7, 4, matrix.Color333(7, 1, 0));
  matrix.fillCircle(23, 7, 4, matrix.Color333(7, 1, 0));

  matrix.drawLine(5, 4, 5, 5, matrix.Color333(0, 0, 0));
  matrix.drawLine(6, 4, 7, 4, matrix.Color333(0, 0, 0));
  matrix.drawLine(7, 3, 10, 3, matrix.Color333(0, 0, 0));

  matrix.drawLine(26, 5, 26, 4, matrix.Color333(0, 0, 0));
  matrix.drawLine(25, 4, 24, 4, matrix.Color333(0, 0, 0));
  matrix.drawLine(24, 3, 21, 3, matrix.Color333(0, 0, 0));

  eysdelay = (rand() % 100)*100; 
  //Serial.println(eysdelay);
  delay(eysdelay);


  for(i=0 ; i<=7 ; i++) {

    matrix.fillCircle(8 , i, 4, matrix.Color333(0, 0, 0));
    matrix.fillCircle(23, i, 4, matrix.Color333(0, 0, 0));

    delay(2);
  }

  delay(200);

  for(j=0 ; j<=7 ; j++) {

    matrix.fillCircle(8 , 7, 4, matrix.Color333(7, 1, 0));
    matrix.fillCircle(23, 7, 4, matrix.Color333(7, 1, 0));

    matrix.drawLine(5, 4, 5, 5, matrix.Color333(0, 0, 0));
    matrix.drawLine(6, 4, 7, 4, matrix.Color333(0, 0, 0));
    matrix.drawLine(7, 3, 10, 3, matrix.Color333(0, 0, 0));

    matrix.drawLine(26, 5, 26, 4, matrix.Color333(0, 0, 0));
    matrix.drawLine(25, 4, 24, 4, matrix.Color333(0, 0, 0));
    matrix.drawLine(24, 3, 21, 3, matrix.Color333(0, 0, 0));

    matrix.fillCircle(8 , 7-j, 4, matrix.Color333(0, 0, 0));
    matrix.fillCircle(23, 7-j, 4, matrix.Color333(0, 0, 0));

    delay(2);
  }
}

void angre() {
 //x1, y1, x2, y2
  i=0;
  j=0;
  matrix.fillCircle(8 , 7, 4, matrix.Color333(7, 0, 0));
  matrix.fillCircle(23, 7, 4, matrix.Color333(7, 0, 0));

  matrix.drawLine(11, 4, 11, 5, matrix.Color333(0, 0, 0));
  matrix.drawLine(10, 4, 10, 4, matrix.Color333(0, 0, 0));
  matrix.drawLine(7, 3, 10, 3, matrix.Color333(0, 0, 0));

  matrix.drawLine(20, 5, 20, 4, matrix.Color333(0, 0, 0));
  matrix.drawLine(20, 4, 21, 4, matrix.Color333(0, 0, 0));
  matrix.drawLine(24, 3, 21, 3, matrix.Color333(0, 0, 0));

  eysdelay = (rand() % 100)*100; 
  //Serial.println(eysdelay);
  delay(eysdelay);


  for(i=0 ; i<=7 ; i++) {

    matrix.fillCircle(8 , i, 4, matrix.Color333(0, 0, 0));
    matrix.fillCircle(23, i, 4, matrix.Color333(0, 0, 0));

    delay(2);
  }

  delay(200);

  for(j=0 ; j<=7 ; j++) {

    matrix.fillCircle(8 , 7, 4, matrix.Color333(7, 0, 0));
    matrix.fillCircle(23, 7, 4, matrix.Color333(7, 0, 0));

    matrix.drawLine(11, 4, 11, 5, matrix.Color333(0, 0, 0));
    matrix.drawLine(10, 4, 10, 4, matrix.Color333(0, 0, 0));
    matrix.drawLine(7, 3, 10, 3, matrix.Color333(0, 0, 0));

    matrix.drawLine(20, 5, 20, 4, matrix.Color333(0, 0, 0));
    matrix.drawLine(20, 4, 21, 4, matrix.Color333(0, 0, 0));
    matrix.drawLine(24, 3, 21, 3, matrix.Color333(0, 0, 0));

    matrix.fillCircle(8 , 7-j, 4, matrix.Color333(0, 0, 0));
    matrix.fillCircle(23, 7-j, 4, matrix.Color333(0, 0, 0));

    delay(2);
  }
}
