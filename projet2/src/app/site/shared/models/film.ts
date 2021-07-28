export class Film {
    id?: Number;
    name?: String;
    category?: String;
    description?: String;
    image?: String;
    price?: Number;
    quantity?: Number;
    descVisible? : boolean;

  constructor(args: Film = {}) {
     this.id = args.id;
     this.name = args.name;
     this.category = args.category;
     this.description = args.description;
     this.image = args.image;
     this.price = args.price;
     this.quantity = args.quantity;
     this.descVisible = args.descVisible;
   }
}
