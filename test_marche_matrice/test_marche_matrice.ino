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

void setup() {
  matrix.begin();
}

void loop() {
  // fill the screen with 'black'
  //matrix.fillScreen(matrix.Color333(0, 0, 0));
  // draw a blue circle
  i=0;
  j=0;
  matrix.fillCircle(8 , 7, 4, matrix.Color333(0, 0, 7));
  matrix.fillCircle(23, 7, 4, matrix.Color333(0, 0, 7));

  
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
