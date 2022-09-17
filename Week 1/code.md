```c#
internal class Program
{
    struct Person
    {
        public string name;
        public int age;
    }

    class Student
    {
        public string name;
        public int age;

        public void printDetails()
        {
            Console.WriteLine(name + " " + age);
        }
    }

    class Animal
    {
        public string name;
        public string color;
        public int height;

        public void printDetails()
        {
            Console.WriteLine("name is : " + name + " Color is " + color + " height is " + height);
        }

        public void printColor()
        {
            Console.WriteLine("the color is " + color);
        }
    }

    static void Main(string[] args)
    {

        // OO Task

        // create the animal structure with the animal class
        Animal a1 = new Animal();
        // set the data for a1
        a1.name = "cat";
        a1.color = "brown";
        a1.height = 12;

        // print out just the color
        a1.printColor();

        // print out all the data
        a1.printDetails();

        // Object-Orateded

        // set the student data
        Student s1 = new Student();
        s1.name = "job";
        s1.age = 43;

        // print the date
        s1.printDetails();


        // Not OO
        Person p1;

        p1.name = "vader";
        p1.age = 57;

        Console.Write("press any key to end");
        Console.ReadKey();
    }
}
```
